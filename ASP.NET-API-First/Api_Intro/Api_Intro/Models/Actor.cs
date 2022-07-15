using System;

namespace Api_Intro.Models
{
    public class Actor
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Image { get; set; }
        public bool IsDeleted { get; set; }
        public DateTime Created_At { get; set; }
    }
}
