using BLL.Entities;
using System.Collections.Generic;

namespace BLL.Interfaces.Repositories
{
    public interface IRepositoryBase<T> where T : EntityBase
    {
        T SelectById(int id, bool asNoTracking = true);
        IList<T> SelectAll();
        void Insert(T entity);
        void Update(T entity);
        void Delete(int id);
    }
}
