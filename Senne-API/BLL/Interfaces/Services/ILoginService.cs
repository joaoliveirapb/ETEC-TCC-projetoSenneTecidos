using BLL.DTOs.Login;
using Microsoft.IdentityModel.Tokens;

namespace BLL.Interfaces.Services
{
    public interface ILoginService
    {
        string AuthenticationUser(InputLoginDTO inputLoginDTO);
    }
}
