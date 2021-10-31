using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Entities
{
    public class Product : EntityBase
    {
        private Product() : base() { }

        public Product(int id, string nameProduct, string description, int categoryId) : base(id)
        {
            NameProduct = nameProduct;
            Description = description;
            Availability = true;
            CategoryId = categoryId;
        }

        public string NameProduct { get; private set; }
        public string Description { get; private set; }
        public bool Availability { get; private set; }
        public int CategoryId { get; private set; }

        public void Disable()
        {
            this.Availability = false;
        }

        public void Activate()
        {
            this.Availability = true;
        }

        public virtual Category Category { get; private set; }
        public virtual ICollection<Image> Images { get; private set; }
    }
}
