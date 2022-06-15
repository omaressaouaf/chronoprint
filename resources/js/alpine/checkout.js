Alpine.data("checkout", (authUserAddresses) => ({
    authUserAddresses: authUserAddresses,
    selectedAddress: authUserAddresses[0] ?? {},
    selectedBillingAddress: authUserAddresses[0] ?? {},
    init() {
        Livewire.on("addressAdded", (newAddress) => {
            this.authUserAddresses.unshift(newAddress);
            this.setSelectedAddress(newAddress.id);
            this.setBillingSelectedAddress(newAddress.id);
        });
    },
    setSelectedAddress(addressId) {
        this.selectedAddress = this.authUserAddresses.find(
            (address) => address.id == addressId
        );
    },
    setBillingSelectedAddress(addressId) {
        this.selectedBillingAddress = this.authUserAddresses.find(
            (address) => address.id == addressId
        );
    },
}));
