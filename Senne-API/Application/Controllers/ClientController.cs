using BLL.DTOs.Client;
using BLL.Enum;
using BLL.Interfaces.Services;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Net;
using System.Threading.Tasks;

namespace Application.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ClientController : ControllerBase
    {
        private readonly IClientService _clientService;

        public ClientController(IClientService clientService)
        {
            _clientService = clientService;
        }

        [HttpGet]
        [Route("{id}", Name = "GetClientById")]
        [Authorize(Roles = "Client")]
        public IActionResult GetClientById(int id)
        {
            return Ok();
        }

        [HttpPost]
        [AllowAnonymous]
        public IActionResult RegistrationClient([FromBody]InputClientDTO inputClientDTO)
        {
            try
            {
                if (!ModelState.IsValid)
                    return BadRequest(ModelState);

                var outputClientDTO = _clientService.RegistrationClient(inputClientDTO);

                if(outputClientDTO != null)
                    return Created(new Uri(Url.Link("GetClientById", new { id = outputClientDTO.Id })), outputClientDTO);

                return BadRequest();
            }
            catch (Exception ex)
            {
                return StatusCode((int)HttpStatusCode.InternalServerError, ex.Message);
            }
        }
    }
}
