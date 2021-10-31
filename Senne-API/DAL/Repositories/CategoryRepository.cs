using BLL.Entities;
using BLL.Interfaces.Repositories;

namespace DAL.Repositories
{
    public class CategoryRepository : RepositoryBase<Category>, ICategoryRepository
    {
        public CategoryRepository(TCCDbContext context) : base(context) { }
    }
}
