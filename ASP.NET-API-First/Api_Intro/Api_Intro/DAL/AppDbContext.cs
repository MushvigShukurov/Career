using Api_Intro.Models;
using Microsoft.EntityFrameworkCore;

namespace Api_Intro.DAL
{
    public class AppDbContext:DbContext
    {
        public AppDbContext(DbContextOptions<AppDbContext> options):base(options)
        {

        }
        public DbSet<Actor> Actors { get; set; }
    }
}
