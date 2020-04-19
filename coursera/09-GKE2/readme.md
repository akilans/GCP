# Architecting with Google Kubernetes Engine: Workloads

# Creating a GKE Cluster via Cloud Shell
* export my_zone=us-central1-a
* export my_cluster=standard-cluster-1
* gcloud container clusters create $my_cluster --num-nodes 3 --zone $my_zone --enable-ip-alias
* gcloud container clusters resize $my_cluster --zone $my_zone --num-nodes=4
* gcloud container clusters get-credentials $my_cluster --zone $my_zone
* kubectl config view
* kubectl cluster-info
* kubectl config current-context
* kubectl config get-contexts
* kubectl config use-context gke_${GOOGLE_CLOUD_PROJECT}_us-central1-a_standard-cluster-1
* kubectl top nodes
* source <(kubectl completion bash)
* kubectl create deployment --image nginx nginx-1
* kubectl get pods
* export my_nginx_pod=[your_pod_name]
* echo $my_nginx_pod
* kubectl describe pod $my_nginx_pod
* kubectl cp ~/test.html $my_nginx_pod:/usr/share/nginx/html/test.html
* kubectl expose pod $my_nginx_pod --port 80 --type LoadBalancer
* kubectl get services
* kubectl apply -f ./new-nginx-pod.yaml
* kubectl exec -it new-nginx /bin/bash
* kubectl port-forward new-nginx 10081:80
* kubectl logs new-nginx -f --timestamps

* kubectl set image deployment.v1.apps/nginx-deployment nginx=nginx:1.9.1 --record
* kubectl rollout status deployment.v1.apps/nginx-deployment
* kubectl rollout history deployment nginx-deployment
* kubectl rollout undo deployments nginx-deployment
* gcloud container clusters create $my_cluster \
   --num-nodes 2 --enable-ip-alias --zone $my_zone
* kubectl autoscale deployment web --max 4 --min 1 --cpu-percent 1
* gcloud container node-pools create "temp-pool-1" \
--cluster=$my_cluster --zone=$my_zone \
--num-nodes "2" --node-labels=temp=true --preemptible

# Helm
* curl -LO https://git.io/get_helm.sh
* chmod 700 get_helm.sh
* ./get_helm.sh
* kubectl create clusterrolebinding user-admin-binding \
   --clusterrole=cluster-admin \
   --user=$(gcloud config get-value account)
* kubectl create serviceaccount tiller --namespace kube-system
* kubectl create clusterrolebinding tiller-admin-binding \
   --clusterrole=cluster-admin \
   --serviceaccount=kube-system:tiller
* helm init --service-account=tiller
* helm repo update
* helm version
* helm install stable/redis
* kubectl get svc
* kubectl get statefulsets
* kubectl get configmaps
* kubectl get secrets
* helm inspect stable/redis
* helm install stable/redis --dry-run --debug

# Networking
* gcloud container clusters create $my_cluster --num-nodes 3 --enable-ip-alias --zone $my_zone --enable-network-policy
* gcloud container clusters get-credentials $my_cluster --zone $my_zone
* kubectl run hello-web --labels app=hello \
  --image=gcr.io/google-samples/hello-app:1.0 --port 8080 --expose
* kubectl apply -f hello-allow-from-foo.yaml
* kubectl run test-1 --labels app=foo --image=alpine --restart=Never --rm --stdin --tty
* wget -qO- --timeout=2 http://hello-web:8080
* kubectl run test-1 --labels app=other --image=alpine --restart=Never --rm --stdin --tty
* wget -qO- --timeout=2 http://hello-web:8080
* kubectl apply -f foo-allow-to-hello.yaml
* kubectl run hello-web-2 --labels app=hello-2 \
  --image=gcr.io/google-samples/hello-app:1.0 --port 8080 --expose
* kubectl run test-3 --labels app=foo --image=alpine --restart=Never --rm --stdin --tty
* wget -qO- --timeout=2 http://hello-web:8080
* wget -qO- --timeout=2 http://hello-web-2:8080
* wget -qO- --timeout=2 http://www.example.com