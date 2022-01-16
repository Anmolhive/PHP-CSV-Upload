# PHP-CSV-Upload
I create this code to upload CSV in the database in packets of 100 elements in one for loop.

Hi,
This is Anmol Singh.

To reach our Goal,
First I Capture CSV data after that explode into lines.
Then, put that exploded lines as an array in an array by the index of row.

After that, Capture the number of times the loop took.
Then, Divide it by 100 and Change it in int and store it in $whileRun.
then, Run the While loop $whileRun + 1 Times so that we cove all data.

After that, We find out how many times our For loop have Run by simply,
First How many Entries left After All While loop Multiply by How many times For loop gonna Run in Per While Loop, In My case, it is 100.
So $runAfter = $arraySize - $whileRun * 100;
Second, I find out How many Entries have to run in Forloof that is,
$run = $arraySize - $runAfter;


Now, All set up.

First, I initialize $size which monitors How many times While Loop Run.
And then, I initialize $ifSize which monitor How many times For Loop Run.

After that,
I run While Loop with a condition where $size has to be smaller or equal to $whileRun.
Start MySQL connection.
Checking Condition $ifSize is smaller or equal to $run.
Running for loop 100 times.
Monitoring Entries by adding 1 to $i.

if the $ifSize becomes greater than $run then compiler comes to else condition,
Where for loop run $runAfter times.

And I get my goal complete.


This is simple code to upload CSV data into Mysql Database, 
You can use this code as Core and Create a Plugin or Apps where one can upload the CSV in Plugin or Apps and it will upload as New Entries
Or Create a condition that gives the User to Select Between New Entries or Update Old Ones.
In Any Case, if you Feel like This Code Can Help You. Please Let Me Know.
