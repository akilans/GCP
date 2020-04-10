# Elastic Google Cloud Infrastructure: Scaling and Automation
* Interconnecting networks
* Load Balancing and autoscaling
* Infrastructure Automation
* Managed Services

* Cloud VPN
    * Establish VPN tunnels between two networks in separate regions such that a VM in one network can ping a VM in the other network over its internal IP address
    * Create VPN gateways in each network
    * Create VPN tunnels between the gateways
    * Verify VPN connectivity
    * Establish private communication between the two VM instances by creating VPN gateways and tunnels between the two networks.

    gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" target-vpn-gateways create "vpn-1" --region "us-central1" --network "vpn-network-1"

gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" forwarding-rules create "vpn-1-rule-esp" --region "us-central1" --address "130.211.196.240" --ip-protocol "ESP" --target-vpn-gateway "vpn-1"

gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" forwarding-rules create "vpn-1-rule-udp500" --region "us-central1" --address "130.211.196.240" --ip-protocol "UDP" --ports "500" --target-vpn-gateway "vpn-1"

gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" forwarding-rules create "vpn-1-rule-udp4500" --region "us-central1" --address "130.211.196.240" --ip-protocol "UDP" --ports "4500" --target-vpn-gateway "vpn-1"

gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" vpn-tunnels create "tunnelt1to2" --region "us-central1" --peer-address "35.190.202.99" --shared-secret "gcprocks" --ike-version "2" --local-traffic-selector "0.0.0.0/0" --target-vpn-gateway "vpn-1"

gcloud compute --project "qwiklabs-gcp-02-9efcd3c4f46f" routes create "tunnelt1to2-route-1" --network "vpn-network-1" --next-hop-vpn-tunnel "tunnelt1to2" --next-hop-vpn-tunnel-region "us-central1" --destination-range "10.1.3.0/24"

* 