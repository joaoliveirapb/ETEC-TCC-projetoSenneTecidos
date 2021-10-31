using BLL.DTOs.Login;
using BLL.Entities;
using BLL.Enum;
using BLL.Interfaces.Repositories;
using BLL.Interfaces.Services;
using BLL.Useful;
using Microsoft.IdentityModel.Tokens;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Security.Claims;

namespace BLL.Services
{
    public class LoginService : ILoginService
    {
        private readonly ILoginRepository _loginRepository;

        public LoginService(ILoginRepository loginRepository)
        {
            _loginRepository = loginRepository;
        }

        public string AuthenticationUser(InputLoginDTO inputLoginDTO)
        {
            try
            {
                var loginEntity = new Login(0, inputLoginDTO.Email, Cryptography.getMdIHash(inputLoginDTO.Password), 0);

                loginEntity = _loginRepository.AuthenticationUser(loginEntity);

                if (loginEntity == null) return null;

                var tokenHandler = new JwtSecurityTokenHandler();
                var keySymmetric = KeySymmetric.GetKey();
                var claims = new List<Claim>()
                {
                    new Claim(ClaimTypes.NameIdentifier, loginEntity.Id.ToString()),
                    new Claim(ClaimTypes.Email, loginEntity.Email),
                    new Claim(ClaimTypes.Role, ((ERole)loginEntity.Role).ToString())
                };

                if (!loginEntity.Role.Equals((int)ERole.Administrator))
                    new Claim(ClaimTypes.Name, loginEntity.Client.Name);

                var token = new JwtSecurityToken(
                    issuer: "Senne",
                    expires: DateTime.UtcNow.AddHours(2),
                    audience: "userApplication",
                    signingCredentials: new SigningCredentials(keySymmetric, SecurityAlgorithms.HmacSha256Signature),
                    claims: claims);

                return tokenHandler.WriteToken(token);
            }
            catch (Exception ex)
            {
                throw new Exception(ex.Message);
            }
        }
    }
}
