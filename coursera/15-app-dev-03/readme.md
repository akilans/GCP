# 
* gcloud builds submit -t gcr.io/$DEVSHELL_PROJECT_ID/quiz-frontend ./frontend/
* gcloud builds submit -t gcr.io/$DEVSHELL_PROJECT_ID/quiz-backend ./backend/
* gcloud app deploy ./frontend/app.yaml --no-promote \
--no-stop-previous-version