using System.ComponentModel.DataAnnotations;

namespace ManagerContact.Models
{
    public class Contact
    {
        [Key]
        public int ID { get; set; }
        public string ContactName { get; set; } 
        public string ContactNumber { get; set; } 
        public string GroupName { get; set; } 
        public DateTime HireDate { get; set; }
        public DateTime Birthday { get; set; }
        public void clone(Contact contact)
        {
            this.ContactName = contact.ContactName;
            this.ContactNumber = contact.ContactNumber;
            this.GroupName = contact.GroupName;
            this.Birthday = contact.Birthday;
        }
    }
}
