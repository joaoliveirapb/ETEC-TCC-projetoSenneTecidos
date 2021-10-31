using BLL.Entities;
using BLL.Interfaces.Repositories;

namespace DAL.Repositories
{
    public class ClientRepository : RepositoryBase<Client>, IClientRepository
    {
        public ClientRepository(TCCDbContext context) : base(context) { }
    }
}
