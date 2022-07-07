/// <reference path="jspack-vsdoc.js" />
var p = MindFusion.Scheduling;

// create a new instance of the calendar
calendar = new p.Calendar(document.getElementById("calendar"));
calendar.currentView = p.CalendarView.ResourceView;

calendar.resourceViewSettings.topTimelineSettings.unit = p.TimeUnit.Month;
calendar.resourceViewSettings.topTimelineSettings.format = "MMMM yyyy";

calendar.resourceViewSettings.middleTimelineSettings.unit = p.TimeUnit.Day;
calendar.resourceViewSettings.middleTimelineSettings.format = "dddd dd";

calendar.resourceViewSettings.bottomTimelineSettings.unit = p.TimeUnit.Hour;
calendar.resourceViewSettings.bottomTimelineSettings.format = "hh:mm tt";

calendar.theme = "business";
calendar.itemSettings.size = 33;

var resource;
var allContacts = [];

// Add some contacts to the schedule.contacts collection.
resource = new p.Contact();
resource.firstName = "Kerry";
resource.lastName = "Lucas";
resource.tag = "Legal";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Elsa";
resource.lastName = "Stanley";
resource.tag = "Legal";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Mike";
resource.lastName = "Phillips";
resource.tag = "Legal";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Kendra";
resource.lastName = "Glover";
resource.tag = "IT Department";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Johnnie";
resource.lastName = "Watts";
resource.tag = "IT Department";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Omar";
resource.lastName = "Copeland";
resource.tag = "Sales";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Shelia";
resource.lastName = "Howell";
resource.tag = "Sales";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Drew";
resource.lastName = "Davidson";
resource.tag = "Sales";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Mable";
resource.lastName = "Logan";
resource.tag = "Sales";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Samuel";
resource.lastName = "Fleming";
resource.tag = "Product Design";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Kimberly";
resource.lastName = "Hughes";
resource.tag = "Human Resources";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Shawn";
resource.lastName = "Pratt";
resource.tag = "Public Relations";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Marc";
resource.lastName = "Harmon";
resource.tag = "Marketing";
calendar.schedule.contacts.add(resource);

resource = new p.Contact();
resource.firstName = "Raquel";
resource.lastName = "Cunningham";
resource.tag = "Marketing";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

resource = new p.Contact();
resource.firstName = "Lillian";
resource.lastName = "Cortez";
resource.tag = "Research & Development";
calendar.schedule.contacts.add(resource);
allContacts.push(resource);

// Add some locations to the schedule.locations collection.
resource = new p.Location();
resource.name = "Legal";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "IT Department";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Sales";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Product Design";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Human Resources";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Public Relations";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Marketing";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "Research & Development";
calendar.schedule.locations.add(resource);

calendar.locations.clear();
calendar.locations.addRange(calendar.schedule.locations.items());
calendar.groupType = p.GroupType.GroupByLocations;

// attach a handler - when a calendar item is being modified.
calendar.itemModifying.addEventListener(handleItemModifying);

calendar.render();

calendar.selectionEnd.addEventListener(validateCreateItem);

calendar.cells.forEach((cell) => {
 
 if(p.DateTime.getDayOfWeek(cell.startTime) != 6 && p.DateTime.getDayOfWeek(cell.startTime) != 0 )
 {
	 
 if(cell.startTime.hour >= 9 && cell.endTime.hour <= 19 && 
	cell.endTime.hour > 0) 
	 cell.bgCell.style.background = 'rgba(0, 0, 120, .1)';	  
 }
}) 


function handleItemModifying(sender, args) {
    /* the args.item argument gives information about
     * the item that was being modified */
	
	// handle drag interaction
	if (args.action == p.ItemModifyAction.Drag || 
		args.action == p.ItemModifyAction.Resize)
	{
		// end of drag interaction - the changes are made
		if (args.changes != null)
		{			
			if ( p.DateTime.getDayOfWeek(args.changes.startTime) == 0 ||
				 p.DateTime.getDayOfWeek(args.changes.startTime) == 6 ||
				 p.DateTime.getDayOfWeek(args.changes.endTime) == 0 ||
				 p.DateTime.getDayOfWeek(args.changes.endTime) == 6)
				{
						  args.cancel = true;
				}
				//checks if an item from calendar is being modified
				else if (!(args.changes.startTime.hour >= 9 && args.changes.endTime.hour <= 18))
				{
			  
					console.log("Events cannot be scheduled during non-working hours.");
					args.cancel = true;
				}
		 }
	}

     
}

function validateCreateItem (sender, args)
{
 //checks if an item from calendar is being modified
 if (!(args.startTime.hour >= 9 && args.endTime.hour <= 18))
 {
  
   console.log("Events cannot be scheduled during non-working hours.");
   args.cancel = true;
 }
 
 //checks if an item from calendar is being modified
 if ( p.DateTime.getDayOfWeek(args.startTime) == 0 ||
     p.DateTime.getDayOfWeek(args.startTime) == 6 ||
	 p.DateTime.getDayOfWeek(args.endTime) == 0 ||
	 p.DateTime.getDayOfWeek(args.endTime) == 6)
 {
  
   console.log("Events cannot be scheduled during weekend");
   args.cancel = true;
 }   
   
    calendar.schedule.contacts.clear();

   allContacts.forEach((contact) => {
    if (contact.tag === args.resource.name)
      calendar.schedule.contacts.add(contact);
  })
  
}
























































