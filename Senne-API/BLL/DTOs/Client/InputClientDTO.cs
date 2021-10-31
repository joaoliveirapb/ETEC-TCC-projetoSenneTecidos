using BLL.Validations;
using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.DTOs.Client
{
    public class InputClientDTO
    {
        [Required]
        public string Name { get; set; }

        [Required]
        public string Surname { get; set; }

        [Required]
        [CPFValidationAttribute]
        public string CPF { get; set; }

        [Required]
        public DateTime BirthDate { get; set; }

        [Required]
        public char Genre { get; set; }

        [Required]
        [DataType(DataType.PhoneNumber)]
        public string Phone { get; set; }

        [Required]
        public string CEP { get; set; }

        [Required]
        public string Address { get; set; }

        [Required]
        public string NumberAddress { get; set; }

        [Required]
        public string City { get; set; }

        [Required]
        [DataType(DataType.EmailAddress)]
        public string Email { get; set; }

        [Required]
        [DataType(DataType.Password)]
        public string Password { get; set; }
    }
}
