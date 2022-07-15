using Microsoft.AspNetCore.Http;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading.Tasks;

namespace MyBiz.Extensions
{
    public static class ExtensionMethod
    {
        public static void Delete(this string src,string path)
        {
            if (File.Exists(path))
            {
                File.Delete(path);
            }
        }
        public static bool CheckSize(this IFormFile ImageFile,int mb = 5)
        {
            if((ImageFile.Length / (1024 * 1024))< mb)
            {
                return true;
            } else
            {
                return false;
            }
        }

        public static bool CheckType(this IFormFile ImageFile)
        {
            if (ImageFile.ContentType.Contains("image/"))
            {
                return true;
            } else
            {
                return false;
            }
        }

        public static string SaveImage(this IFormFile ImageFile,string path)
        {
            string fileName = Guid.NewGuid().ToString() + ImageFile.FileName;
            if(ImageFile.CheckType() && ImageFile.CheckSize(5))
            {
                using(FileStream fs = new FileStream(Path.Combine(path, fileName), FileMode.Create))
                {
                    ImageFile.CopyTo(fs);
                }
            }
            return fileName;
        }
    }
}
