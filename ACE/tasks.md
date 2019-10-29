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

## Cloud Storage gs://akilan/
* menu -> stoarge -> create bucket
* Nearline - Best for backup and monthly once access data
* coldline - Best for Data recovery and yearly once access data
* Standard - Best for frequent access
* Upload files and change permission. Add user -> allUsers -> reader - Now it can be accessed via https://storage.googleapis.com/$BUCKET_NAME/kali-dragon-black.png

## Cloud Storage using gutil
* gcloud config list - Shows project information
* gsutil ls -list all the buckets
* gsutil ls gs://akilan - list all the files under akilan bucket
* gsutil ls gs://akilan/** - list all the files under akilan bucket [including sub folders]
* gsutil mb -c standard -l eu gs://akilan-test - create a bucket using cli
* gsutil label get gs://akilan - get label of the bucket
```
{
    "name":"akilan"
}
```
* gsutil label set label.json gs://akilan
* gsutil label ch -l "name:inba" gs://akilan
* gsutil versioning get gs://akilan - Status of versioning in the bucket
* gsutil versioning set on gs://akilan - Enable versioning
* gsutil cp akilan.txt gs://akilan - upload local file akilan.txt to bucket
* gsutil rm gs://akilan/label.json
* gsutil ls -a gs://akilan - still label version shows
* gsutil cp gs://akilan/** gs://akilan-test - Bucket to bucket copy [without folder structure]
* gsutil cp -r gs://akilan/ gs://akilan-test - Bucket to bucket copy [with folder structure]
* gsutil acl ch -u AllUsers:R gs://akilan-test/kali-dragon-black.png
* gsutil acl set private gs://akilan-test
* gsutil iam ch -d allUsers:objectViewer gs://bucket-name - remove public access in bucket level
* 

## Gcloud - GCE
* gcloud config get-value project
* gcloud services list | --enabled | --available
* gcloud services enable 
* gcloud compute instances list
* gcloud compute instances create myvm
* gcloud compute instances delete myvm
* gcloud config set <property> <value>
* gcloud config get-value <property>
* gcloud config unset <property>
* gcloud init - reinitialize or add new account
* gcloud config set project $PROJECT_ID
* gcloud config set compute/region europe-west2
* gcloud config set compute/zone europe-west2-a
* gcloud config configurations list - lists all the available accounts. Configuration is used when we need to work with multiple google cloud config/account
* gcloud config configurations activate akilan-468 - activate the particular config
* gcloud compute instances list --configuration=akilan-468
* gcloud config list - list all the properties for the active one
* gcloud compute machine-types list
* gcloud compute machine-types list --filter="NAME=f1-micro AND ZONE~europe-west2" - list the machine types using filter
* gcloud compute instances create --machine-type=f1-micro my-vm
* gcloud compute instances delete my-vm