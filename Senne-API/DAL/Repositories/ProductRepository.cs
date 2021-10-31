using BLL.Entities;
using BLL.Interfaces.Repositories;

namespace DAL.Repositories
{
    public class ProductRepository : RepositoryBase<Product>, IProductRepository
    {
        public ProductRepository(TCCDbContext context) : base(context) { }
    }
}
