using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Logging;
using MyBiz.DAL;
using System;
using System.Collections.Generic;
using System.Diagnostics;
using System.Linq;
using System.Threading.Tasks;

namespace MyBiz.Controllers
{
    public class HomeController : Controller
    {
        private readonly AppDbContext _context;
        public HomeController(AppDbContext context)
        {
            _context = context;
        }
        public IActionResult Index()
        {
            return View(_context.Teams.OrderByDescending(data=>data.Id).Take(4).ToList());
        }

       

        
    }
}
