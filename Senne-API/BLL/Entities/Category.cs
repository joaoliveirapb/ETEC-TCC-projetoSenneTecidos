using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Entities
{
    public class Category : EntityBase
    {
        private Category() : base() { }

        public Category(int id, string nameCategory) : base(id)
        {
            NameCategory = nameCategory;
            Active = true;
        }

        public string NameCategory { get; private set; }
        public bool Active { get; private set; }

        public void Disable()
        {
            this.Active = false;
        }

        public void Activate()
        {
            this.Active = true;
        }

        public virtual ICollection<Product> Products { get; private set; }
    }
}
