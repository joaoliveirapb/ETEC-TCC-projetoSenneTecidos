using BLL.Enum;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace BLL.Entities
{
    public class Login : EntityBase
    {
        private Login() : base() { }

        public Login(int id, string email, string password, int role) : base(id)
        {
            Email = email;
            Password = password;
            Role = role;
        }

        public string Email { get; private set; }
        public string Password { get; private set; }
        public int Role { get; private set; }

        public virtual Client Client { get; private set; }
    }
}
