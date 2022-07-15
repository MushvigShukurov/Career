using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace MyBiz.ViewModels
{
    public class PaginationVM<T>
    {
        public int ActivePage { get; set; }
        public int PageCount { get; set; }
        public List<T> Items { get; set; }
    }
}
