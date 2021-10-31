using BLL.Entities;
using BLL.Interfaces.Repositories;

namespace DAL.Repositories
{
    public class ImageRepostory : RepositoryBase<Image>, IImageRepository
    {
        public ImageRepostory(TCCDbContext context) : base(context) { }
    }
}
