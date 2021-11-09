using BLL.Entities;
using BLL.Enum;
using BLL.Useful;
using Microsoft.EntityFrameworkCore;

namespace DAL
{
    public class TCCDbContext : DbContext
    {
        public TCCDbContext() { }

        public TCCDbContext(DbContextOptions<TCCDbContext> options) : base(options) { }

        public DbSet<Login> logins { get; set; }
        public DbSet<Client> clients { get; set; }
        public DbSet<Category> categories { get; set; }
        public DbSet<Product> products { get; set; }
        public DbSet<Image> images { get; set; }

        protected override void OnConfiguring(DbContextOptionsBuilder optionsBuilder)
        {
            optionsBuilder.UseSqlServer(@"Server=DESKTOP-JO9IQAT;Database=SenneDatabase;Trusted_Connection=True;");
            //optionsBuilder.UseMySQL(@"server=localhost;port=3306;database=sennedatabase;uid=root;password=root;");
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Login>(entity =>
            {
                entity.ToTable("Login");
                entity.HasKey(x => x.Id);
                entity.HasIndex(x => x.Email).IsUnique();
                entity.Property(x => x.Password);
                entity.Property(x => x.Role);
                entity.HasOne(x => x.Client).WithOne(x => x.Login).HasForeignKey<Client>(x => x.LoginId);
                entity.HasData(new Login(1, "admin@sennetecidos.com", Cryptography.getMdIHash("admin"), (int)ERole.Administrator));

            });
            modelBuilder.Entity<Client>(entity =>
            {
                entity.ToTable("Client");
                entity.HasKey(x => x.Id);
                entity.HasIndex(x => x.CPF).IsUnique();
                entity.Property(x => x.Name);
                entity.Property(x => x.Surname);
                entity.Property(x => x.BirthDate);
                entity.Property(x => x.Address);
                entity.Property(x => x.CEP);
                entity.Property(x => x.NumberAddress);
                entity.Property(x => x.City);
                entity.Property(x => x.Phone);
                entity.Property(x => x.Genre).HasColumnType("char");
            });
            modelBuilder.Entity<Category>(entity =>
            {
                entity.ToTable("Category");
                entity.HasKey(x => x.Id);
                entity.HasIndex(x => x.NameCategory).IsUnique();
                entity.Property(x => x.Active);
            });
            modelBuilder.Entity<Product>(entity =>
            {
                entity.ToTable("Product");
                entity.HasKey(x => x.Id);
                entity.Property(x => x.NameProduct);
                entity.Property(x => x.Description);
                entity.Property(x => x.Availability);
                entity.HasOne(x => x.Category).WithMany(x => x.Products).HasForeignKey(X => X.CategoryId);

            });
            modelBuilder.Entity<Image>(entity =>
            {
                entity.ToTable("Image");
                entity.HasKey(x => x.Id);
                entity.HasIndex(x => x.UrlImage).IsUnique();
                entity.HasOne(x => x.Product).WithMany(x => x.Images).HasForeignKey(x => x.ProductId);
            });

            base.OnModelCreating(modelBuilder);
        }
    }
}
