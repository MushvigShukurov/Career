using Api_Intro.DAL;
using Api_Intro.DTO;
using Api_Intro.Models;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;

namespace Api_Intro.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ActorController : ControllerBase
    {
        private readonly AppDbContext _context;
        public ActorController(AppDbContext context)
        {
            _context = context;
        }

        [Route("")]
        public IActionResult All()
        {
            List<Actor> actors = _context.Actors.ToList();
            return Ok(actors);
        }



        [Route("{id}")]
        public IActionResult Delete(int id)
        {
            Actor actor = _context.Actors.Find(id);
            if(actor != null)
            {
                actor.IsDeleted = true;
            }
            _context.SaveChanges();

            return NoContent();
        }
        [HttpPost]
        public IActionResult Create(ActorDto actorDto)
        {

            Actor actor = new Actor()
            {
                Name = actorDto.Name,
                Image = actorDto.Image,
                IsDeleted = false,
                Created_At = DateTime.Now
            };
            
            if (actor is null)
            {
                return StatusCode(StatusCodes.Status400BadRequest, new { message = "Null Referans" });
            }

            bool isExist = _context.Actors.Any(a => a.Name.Trim().ToLower() == actor.Name.ToLower().Trim());
            if (isExist)
            {
                return StatusCode(StatusCodes.Status404NotFound, new { message = "Already Is Exists!" });

            }
            _context.Actors.Add(actor);
            _context.SaveChanges();
            return NoContent();

        }

       
        [HttpPut ,Route("{id}")]
        public IActionResult Update(int id,ActorDto actorDto)
        {
            Actor actor = _context.Actors.Find(id);
            if(actor != null)
            {
                actor.Name = actorDto.Name;
                actor.Image = actorDto.Image;
                actor.IsDeleted = false;
            }
            _context.SaveChanges();
            return NoContent();

        }

    }
}
