# AirspaceTracker
Tracks aircraft that enter P-73 restricted airspace over Mount Vernon

## What does it do?
- Checks against the public airspace for flights violating Mount Vernon's P-73 restricted airspace
- Writes flight data to a log file

## How to use this 
- edit monitor.php and in the config section set your center point longitude, latitude and minimum altitude
- add "php monitor.php" to your crontab to refreh at an interval you want to monitor
- if you want to reset your log file you can run the command "sh clear.sh".  This deletes the files and re-establishes the file with the proper headers.  Be sure to backup your log before you run this command.

## FAA Rules for Mount Vernon

P-73 Mount Vernon, VA
Boundaries. That airspace within a 0.5-mile radius of lat. 38°42'28"N., long. 77°05'10"W. Designated altitudes. Surface to but not including 1,500 feet MSL.
Time of designation. Continuous.
Using agency. Administrator, FAA, Washington, DC.