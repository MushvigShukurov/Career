using Microsoft.EntityFrameworkCore.Migrations;

namespace MyBiz.Migrations
{
    public partial class Initial2 : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Facebook",
                table: "Teams",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Instagram",
                table: "Teams",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Linkedin",
                table: "Teams",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Twitter",
                table: "Teams",
                nullable: true);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Facebook",
                table: "Teams");

            migrationBuilder.DropColumn(
                name: "Instagram",
                table: "Teams");

            migrationBuilder.DropColumn(
                name: "Linkedin",
                table: "Teams");

            migrationBuilder.DropColumn(
                name: "Twitter",
                table: "Teams");
        }
    }
}
