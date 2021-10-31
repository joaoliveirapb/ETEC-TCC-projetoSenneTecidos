using BLL.DTOs.Login;
using BLL.Interfaces.Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.IdentityModel.Tokens.Jwt;
using System.Linq;
using System.Net;
using System.Threading.Tasks;

namespace Application.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class LoginController : ControllerBase
    {
        private readonly ILoginService _loginService;

        public LoginController(ILoginService loginService)
        {
            _loginService = loginService;
        }

        [HttpPost]
        [AllowAnonymous]
        public IActionResult Login([FromBody] InputLoginDTO inputLoginDTO)
        {
            try
            {
                if (!ModelState.IsValid)
                    return BadRequest();

                var JWT = _loginService.AuthenticationUser(inputLoginDTO);
                if (JWT == null)
                    return Unauthorized();

                return Ok(new { token = JWT });
            }
            catch (Exception ex)
            {
                return StatusCode((int)HttpStatusCode.InternalServerError, ex.Message);
            }
        }
    }
}
