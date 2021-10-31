using BLL.Entities;
using BLL.Interfaces.Repositories;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace DAL.Repositories
{
    public class RepositoryBase<T> : IRepositoryBase<T> where T : EntityBase
    {
        protected readonly TCCDbContext _context;
        protected readonly DbSet<T> _dbSet;

        public RepositoryBase(TCCDbContext context)
        {
            _context = context;
            _dbSet = context.Set<T>();
        }

        public void Delete(int id)
        {
            var entity = SelectById(id);

            if(entity != null)
            {
                _dbSet.Remove(entity);
                _context.SaveChanges();
            }
        }

        public void Insert(T entity)
        {
            _dbSet.Add(entity);
            _context.SaveChanges();
        }

        public IList<T> SelectAll()
        {
            return _dbSet.ToList();
        }

        public T SelectById(int id, bool asNoTracking = true)
        {
            IQueryable<T> query = _dbSet;
            if (asNoTracking)
                query = query.AsNoTracking();

            return query.FirstOrDefault(x => x.Id == id);
        }

        public void Update(T entity)
        {
            _dbSet.Update(entity);
            _context.SaveChanges();
        }
    }
}
