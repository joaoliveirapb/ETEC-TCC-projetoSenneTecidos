using BLL.Entities;
using BLL.Interfaces.Repositories;
using Microsoft.EntityFrameworkCore;
using System.Linq;

namespace DAL.Repositories
{
    public class LoginRepository : RepositoryBase<Login>, ILoginRepository
    {
        public LoginRepository(TCCDbContext context) : base(context) { }

        public Login AuthenticationUser(Login login)
        {
            return _dbSet.Where(x => x.Email.ToLower() == login.Email.ToLower() && x.Password == login.Password).Include(x => x.Client).FirstOrDefault();
        }
    }
}
