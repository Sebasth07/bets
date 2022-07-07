var p = MindFusion.Scheduling;

// create a new instance of the calendar
calendar = new p.Calendar(document.getElementById("calendar"));
calendar.currentView = p.CalendarView.ResourceView;



calendar.resourceViewSettings.middleTimelineSettings.unit = p.TimeUnit.Day;
calendar.resourceViewSettings.middleTimelineSettings.format = "dddd";

//agregar Habitaciones
resource = new p.Location();
resource.name = "101";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "102";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "103";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "104";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "105";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "106";
calendar.schedule.locations.add(resource);

resource = new p.Location();
resource.name = "107";
calendar.schedule.locations.add(resource);

calendar.theme = "business";

calendar.locations.clear();
calendar.locations.addRange(calendar.schedule.locations.items());
calendar.groupType = p.GroupType.GroupByLocations;
calendar.render();