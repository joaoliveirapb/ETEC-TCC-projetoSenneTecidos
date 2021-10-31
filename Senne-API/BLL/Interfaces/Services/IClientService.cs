using BLL.DTOs.Client;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Interfaces.Services
{
    public interface IClientService
    {
        OutputClientDTO RegistrationClient(InputClientDTO inputClientDTO);
    }
}
