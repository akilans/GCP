# Labs
## Setup Billing Export
* Create new project -> Enable Big Query -> Create Dataset for that project
* Select main project -> Select Billing -> Billing export -> configure bigquery export -> select bigquery of the previous project -> Save 

## Setup Billing Alert
* Go to project -> billing -> budget & alerts -> create budget -> all projects and al resources -> mention target amount -> configure trigger alert

## Setup Non-admin user account
* Billing -> Manage billing account -> Add new users to billing account user not admin -> Logout
* Login as new user -> No rights to view other projects -> create new project -> can't edit billing account -> Can see new project associated with the billing account

## Explore Cloud Shell and Editor
* Activate cloud shell -> git clone https://github.com/ACloudGuru/gcp-cloud-engineer.git -> node hello.js -> open web preview -> see the response
* Click edit icon -> opens the cloud editor -> Edit & save files
* If you want to change the default port 8080 -> change port -> enter port
* use nodemon to reflect the changes immediately
