<template>
  <input type="hidden" name="allowed_quantities" :value="allowedQuantities" />
  <div class="panel-body">
    <div class="row">
      <div v-if="error" class="alert alert-danger">{{ error }}</div>
      <div class="form-group col-md-3">
        <label class="control-label">Quantités autorisées</label>
        <input
          v-model="quantity"
          type="number"
          class="form-control"
          placeholder="La quantité"
        />
      </div>
      <div class="form-group col-md-3 form-actions">
        <button @click="addQuantity" type="button" class="btn btn-primary">
          Ajouter
        </button>
      </div>
    </div>
    <div v-if="quantitiesList.length" class="row col-md-12">
      <ul>
        <li
          class="quantities-row"
          v-for="(quantity, index) in this.quantitiesList"
          :key="index"
        >
          <h5 class="text-capitalize font-weight-bold">
            {{ quantity }}
          </h5>
          <div class="actions">
            <a href="#" @click.prevent="deleteQuantity(index)"
              ><i class="voyager-x text-danger"></i
            ></a>
          </div>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    productAllowedQuantities: {
      type: Array,
    },
  },
  data() {
    return {
      quantity: 1,
      error: null,
      quantitiesList: this.productAllowedQuantities || [],
    };
  },
  computed: {
    allowedQuantities() {
      return JSON.stringify(this.quantitiesList);
    },
  },
  methods: {
    validateForm() {
      this.error = null;

      if (typeof this.quantity === "string" && this.quantity.trim() === "") {
        this.error = "La quantité est requise";

        return false;
      }

      return true;
    },
    addQuantity() {
      if (!this.validateForm()) {
        return;
      }

      this.quantitiesList.push(this.quantity);
    },
    deleteQuantity(index) {
      this.quantitiesList.splice(index, 1);
    },
  },
};
</script>

<style scoped>
ul {
  padding-inline-start: 20px !important;
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}
.quantities-row {
  display: flex;
  gap: 15px;
  border: 1px solid #22a8f08a;
  padding: 7px 15px !important;
  border-radius: 20px;
  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px !important;
  color: #229ef0;
}
.quantities-row:hover {
  background-color: #22a8f011 !important;
}
.actions {
  display: flex;
  gap: 7px;
}
.form-actions {
  margin-top: 20px;
}
</style>

