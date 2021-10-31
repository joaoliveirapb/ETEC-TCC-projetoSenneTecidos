using Microsoft.EntityFrameworkCore.Migrations;

namespace DAL.Migrations
{
    public partial class changeSeedAdmin : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Login",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "Password", "Role" },
                values: new object[] { "21232f297a57a5a743894a0e4a801fc3", 1 });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Login",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "Password", "Role" },
                values: new object[] { "admin", 2 });
        }
    }
}
