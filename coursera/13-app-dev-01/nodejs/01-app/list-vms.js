const Compute = require('@google-cloud/compute');

// Get a compute client
const compute = new Compute();

console.log('Listing VMs in the project:');

// Get the VM instances and display them
compute.getVMs().then(([vms]) => {
    vms.forEach(console.log);
});