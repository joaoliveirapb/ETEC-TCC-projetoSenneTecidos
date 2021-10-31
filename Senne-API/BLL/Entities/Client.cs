using System;

namespace BLL.Entities
{
    public class Client : EntityBase
    {
        private Client() : base() { }

        public Client(
            int id,
            string name, 
            string surname, 
            string cpf, 
            DateTime birthDate, 
            char genre, 
            string phone, 
            string cep, 
            string address, 
            string numberAddress,
            string city,
            int loginId) : base(id)
        {
            Name = name;
            Surname = surname;
            CPF = cpf;
            BirthDate = birthDate;
            Genre = genre;
            Phone = phone;
            CEP = cep;
            Address = address;
            NumberAddress = numberAddress;
            City = city;
            LoginId = loginId;
        }

        public Client(
        int id,
        string name,
        string surname,
        string cpf,
        DateTime birthDate,
        char genre,
        string phone,
        string cep,
        string address,
        string numberAddress,
        string city,
        Login login) : base(id)
        {
            Name = name;
            Surname = surname;
            CPF = cpf;
            BirthDate = birthDate;
            Genre = genre;
            Phone = phone;
            CEP = cep;
            Address = address;
            NumberAddress = numberAddress;
            City = city;
            Login = login;
        }

        public string Name { get; private set; }
        public string Surname { get; private set; }
        public string CPF { get; private set; }
        public DateTime BirthDate { get; private set; }
        public char Genre { get; private set; }
        public string Phone { get; private set; }
        public string CEP { get; private set; }
        public string Address { get; private set; }
        public string NumberAddress { get; private set; }
        public string City { get; private set; }
        public int LoginId { get; private set; }

        public Login Login { get; private set; }
    }
}
