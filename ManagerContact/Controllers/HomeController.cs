using ManagerContact.Models;
using Microsoft.AspNetCore.Mvc;
using System.Diagnostics;

namespace ManagerContact.Controllers
{
    public class HomeController : Controller
    {
        private DatabaseContext _dbContext;
        public HomeController(DatabaseContext dbContext)
        {
            _dbContext = dbContext;
        }

        public IActionResult Index()
        {
            List<Contact> contacts = this._dbContext.Contacts.OrderBy(m => m.ContactName).ToList();
            return View(contacts);
        }
        [HttpPost]
        public IActionResult Search(string keyword)
        {
            if (string.IsNullOrWhiteSpace(keyword))
            {
                return RedirectToAction("Index");
            }
            List<Contact> contacts = this._dbContext.Contacts.Where(m => m.ContactName.ToLower().Contains(keyword.ToLower())).OrderBy(m => m.ContactName).ToList();
            return View("Index", contacts);
        }

        public IActionResult Create()
        {
            return View();
        }
        [HttpPost]
        public IActionResult Create(Contact contact)
        {
            bool isLegitNumber = int.TryParse(contact.ContactNumber, out _);
            bool isLegitUser = this._dbContext.Contacts.FirstOrDefault(m => m.ContactName.ToLower() == contact.ContactName.ToLower() && m.ID != contact.ID) == null;
            bool isLegit = isLegitNumber && isLegitUser;
            if (isLegit)
            {
                this._dbContext.Contacts.Add(contact);
                this._dbContext.SaveChanges();
            }
            return RedirectToAction("Index");
        }

        public IActionResult Details(int ?id)
        {
            if(id == null)
            {
                return NotFound();
            }
            Contact contact = this._dbContext.Contacts.FirstOrDefault(m => m.ID == id);
            if(contact == null)
            {
                return NotFound();
            }
            return View(contact);
        }
        public IActionResult Edit(int? id)
        {
            if (id == null)
            {
                return NotFound();
            }
            Contact contact = this._dbContext.Contacts.FirstOrDefault(m => m.ID == id);
            if (contact == null)
            {
                return NotFound();
            }
            return View(contact);
        }
        [HttpPost]
        public IActionResult Edit(Contact contact)
        {
            if (contact == null)
            {
                return BadRequest();
            }
            Contact contactEditing = this._dbContext.Contacts.FirstOrDefault(m => m.ID == contact.ID);
            if (contactEditing == null)
            {
                return NotFound();
            }
            bool isLegitNumber = int.TryParse(contact.ContactNumber, out _);
            bool isLegitUser = this._dbContext.Contacts.FirstOrDefault(m => m.ContactName.ToLower() == contact.ContactName.ToLower() && m.ID != contact.ID) == null;
            bool isLegit = isLegitNumber && isLegitUser;
            if(isLegit)
            {
                contactEditing.clone(contact);
                this._dbContext.SaveChanges();
            }
            return RedirectToAction("Details",new {id = contact.ID});
        }
        public IActionResult Delete(int ?id)
        {
            if (id == null)
            {
                return NotFound();
            }
            Contact contact = this._dbContext.Contacts.FirstOrDefault(m => m.ID == id);
            if (contact == null)
            {
                return NotFound();
            }
            return View(contact);
        }
        [HttpPost]
        public IActionResult ConfirmDelete(int? IDdelete)
        {
            if(IDdelete == null)
            {
                return BadRequest();
            }
            Contact contact = this._dbContext.Contacts.FirstOrDefault(m => m.ID == IDdelete);
            if (contact == null)
            {
                return NotFound();
            }
            this._dbContext.Contacts.Remove(contact);
            this._dbContext.SaveChanges();
            return RedirectToAction("Index");
        }
    }
}