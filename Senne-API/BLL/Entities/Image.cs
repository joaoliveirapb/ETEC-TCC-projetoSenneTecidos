using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Entities
{
    public class Image : EntityBase
    {
        private Image() : base() { }

        public Image(int id, string urlImage, int productId) : base(id)
        {
            UrlImage = urlImage;
            ProductId = productId;
        }

        public string UrlImage { get; private set; }
        public int ProductId { get; private set; }

        public virtual Product Product { get; private set; }
    }
}
