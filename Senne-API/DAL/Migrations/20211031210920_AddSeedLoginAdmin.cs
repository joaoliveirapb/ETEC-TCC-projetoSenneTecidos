using Microsoft.EntityFrameworkCore.Migrations;

namespace DAL.Migrations
{
    public partial class AddSeedLoginAdmin : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.InsertData(
                table: "Login",
                columns: new[] { "Id", "Email", "Password", "Role" },
                values: new object[] { 1, "admin@sennetecidos.com", "admin", 2 });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DeleteData(
                table: "Login",
                keyColumn: "Id",
                keyValue: 1);
        }
    }
}
