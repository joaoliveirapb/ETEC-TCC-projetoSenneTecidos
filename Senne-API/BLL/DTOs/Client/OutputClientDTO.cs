using System;

namespace BLL.DTOs.Client
{
    public class OutputClientDTO
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Surname { get; set; }
        public string CPF { get; set; }
        public DateTime BirthDate { get; set; }
        public char Genre { get; set; }
        public string Phone { get; set; }
        public string CEP { get; set; }
        public string Address { get; set; }
        public string NumberAddress { get; set; }
        public string City { get; set; }
        public string Email { get; set; }
    }
}
