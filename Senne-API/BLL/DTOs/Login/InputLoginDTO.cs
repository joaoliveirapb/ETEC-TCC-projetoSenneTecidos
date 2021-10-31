using System.ComponentModel.DataAnnotations;

namespace BLL.DTOs.Login
{
    public class InputLoginDTO
    {
        [Required]
        [DataType(DataType.EmailAddress)]
        public string Email { get; set; }

        [Required]
        [DataType(DataType.Password)]
        public string Password { get; set; }
    }
}
