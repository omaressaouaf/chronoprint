Alpine.data("checkout", (authUserAddresses) => ({
    authUserAddresses: authUserAddresses,
    selectedAddress: authUserAddresses[0] ?? {},
    init() {
        Livewire.on("addressAdded", (newAddress) => {
            this.authUserAddresses.unshift(newAddress);
            this.setSelectedAddress(newAddress.id);
        });
    },
    setSelectedAddress(addressId) {
        this.selectedAddress = this.authUserAddresses.find(
            (address) => address.id == addressId
        );
    },
}));
