using BLL.DTOs.Client;
using BLL.Entities;
using BLL.Enum;
using BLL.Interfaces.Repositories;
using BLL.Interfaces.Services;
using BLL.Useful;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Services
{
    public class ClientService : IClientService
    {
        private readonly IClientRepository _clientRepository;

        public ClientService(IClientRepository clientRepository)
        {
            _clientRepository = clientRepository;
        }

        public OutputClientDTO RegistrationClient(InputClientDTO inputClientDTO)
        {
            try
            {
                var loginEntity = new Login(0, inputClientDTO.Email, Cryptography.getMdIHash(inputClientDTO.Password), (int)ERole.Client);
                var clientEntity = new Client(
                    0, 
                    inputClientDTO.Name, 
                    inputClientDTO.Surname, 
                    inputClientDTO.CPF, 
                    inputClientDTO.BirthDate,
                    inputClientDTO.Genre,
                    inputClientDTO.Phone,
                    inputClientDTO.CEP,
                    inputClientDTO.Address,
                    inputClientDTO.NumberAddress,
                    inputClientDTO.City,
                    loginEntity);

                _clientRepository.Insert(clientEntity);

                var outputClientDTO = new OutputClientDTO()
                {
                    Id = clientEntity.Id,
                    Name = clientEntity.Name,
                    Surname = clientEntity.Surname,
                    CPF = clientEntity.CPF,
                    BirthDate = clientEntity.BirthDate,
                    Genre = clientEntity.Genre,
                    Phone = clientEntity.Phone,
                    CEP = clientEntity.CEP,
                    Address = clientEntity.Address,
                    NumberAddress = clientEntity.Address,
                    City = clientEntity.City,
                    Email = clientEntity.Login.Email
                };

                return outputClientDTO;
            }
            catch (Exception ex)
            {
                throw new Exception(ex.Message);
            }
        }
    }
}
