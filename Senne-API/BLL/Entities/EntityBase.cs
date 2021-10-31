using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Entities
{
    public abstract class EntityBase
    {
        protected EntityBase() { }

        protected EntityBase(int id)
        {
            Id = id;
        }

        public int Id { get; set; }
    }
}
