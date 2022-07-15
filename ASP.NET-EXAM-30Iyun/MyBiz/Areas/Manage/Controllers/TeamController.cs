using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Mvc;
using MyBiz.DAL;
using MyBiz.Extensions;
using MyBiz.Models;
using MyBiz.ViewModels;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace MyBiz.Areas.Manage.Controllers
{
    [Area("Manage")]
    [Authorize]
    public class TeamController : Controller
    {

        private readonly AppDbContext _context;
        private readonly IWebHostEnvironment _env;
        public TeamController(AppDbContext context, IWebHostEnvironment env)
        {
            _context = context;
            _env = env;
        }
        public IActionResult Index(int page = 1)
        {
            PaginationVM<Team> allData = new PaginationVM<Team>()
            {
                ActivePage = page,
                PageCount = GetPageCount(_context.Teams.ToList().Count()),
                Items = _context.Teams.OrderByDescending(data => data.Id).Skip((page - 1) * 2).Take(2).ToList()
            };
            return View(allData);
        }

        public IActionResult Create()
        {
            return View();
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Create(Team team)
        {
            if (!ModelState.IsValid)
            {
                ModelState.AddModelError("", "Formu Tam Doldurun !");
                return View();
            }
            bool isExists = _context.Teams.Any(data => data.FullName.Trim().ToLower() == team.FullName.ToLower().Trim());
            if (isExists)
            {
                ModelState.AddModelError("", "Eyni FullName -e icaze yoxdur !");
                return View();
            }
            if (team.ImageFile is null)
            {
                return View();
            }
            team.ImageSrc = team.ImageFile.SaveImage(Path.Combine(_env.WebRootPath, "upload"));
            _context.Teams.Add(team);
            _context.SaveChanges();
            return RedirectToAction("Index");
        }

        public IActionResult Delete(int? id)
        {
            if (id == null)
            {
                return BadRequest();
            }
            Team teamDb = _context.Teams.Find(id);
            if(teamDb == null)
            {
                return NotFound();
            }
            _context.Teams.Remove(teamDb);
            _context.SaveChanges();
            return RedirectToAction("Index");
        }

        public IActionResult Edit(int? id)
        {
            if (id == null)
            {
                return BadRequest();
            }
            Team teamDb = _context.Teams.Find(id);
            if (teamDb == null)
            {
                return NotFound();
            }
            return View(teamDb);
        }
        [HttpPost]
        [ValidateAntiForgeryToken]
        public IActionResult Edit(int id, Team team)
        {
            if (!ModelState.IsValid)
            {
                ModelState.AddModelError("", "Formu Tam Doldurun !");
                return View();
            }
            Team teamDb = _context.Teams.Find(id);
            if (teamDb == null)
            {
                return NotFound();
            }
            if(team.ImageFile is null)
            {
                return View();
            }
            teamDb.ImageSrc.Delete(Path.Combine(_env.WebRootPath, "upload", teamDb.ImageSrc));
            teamDb.ImageSrc = team.ImageFile.SaveImage(Path.Combine(_env.WebRootPath, "upload"));
            teamDb.FullName = team.FullName;
            teamDb.Instagram = team.Instagram;
            teamDb.Facebook = team.Facebook;
            teamDb.Twitter = team.Twitter;
            teamDb.Linkedin = team.Linkedin;
            teamDb.Description = team.Description;
            teamDb.Position = team.Position;
            _context.SaveChanges();
            return RedirectToAction("Index");
        }
        public int GetPageCount(int count=2)
        {
            return (int) Math.Ceiling(((decimal)count / 2));
        }
    }
}
