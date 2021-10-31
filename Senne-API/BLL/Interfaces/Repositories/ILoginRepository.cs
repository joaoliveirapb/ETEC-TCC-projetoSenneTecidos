using BLL.Entities;

namespace BLL.Interfaces.Repositories
{
    public interface ILoginRepository : IRepositoryBase<Login>
    {
        Login AuthenticationUser(Login login);
    }
}
