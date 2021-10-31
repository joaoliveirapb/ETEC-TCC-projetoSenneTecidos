using Microsoft.IdentityModel.Tokens;
using System.Text;

namespace BLL.Useful
{
    public static class KeySymmetric
    {
        private static string _keySecurity = "47ryc348nx34nrxc44nmxc74r";

        public static SymmetricSecurityKey GetKey()
        {
            var keySymmetric = new SymmetricSecurityKey(Encoding.UTF8.GetBytes(_keySecurity));
            return keySymmetric;
        }
    }
}
