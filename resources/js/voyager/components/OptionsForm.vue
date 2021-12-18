<template>
  <input type="hidden" name="options" :value="options" />
  <div class="panel-body">
    <div class="row col-md-12">
      <h4 class="col-md-12">{{ formTitle }}</h4>
    </div>
    <div class="row col-md-12">
      <div v-if="error" class="alert alert-danger">{{ error }}</div>
      <div class="form-group col-md-6">
        <label class="control-label">Nom</label>
        <input
          v-model="form.name"
          type="text"
          class="form-control"
          placeholder="Nom d'option"
        />
      </div>
      <div class="form-group col-md-3">
        <label class="control-label">Prix</label>
        <input
          v-model="form.price"
          type="number"
          class="form-control"
          placeholder="Prix d'option"
        />
      </div>
      <div class="form-group col-md-3 form-actions">
        <div class="actions" v-if="editMode">
          <button @click="updateOption" type="button" class="btn btn-success">
            Sauvgarder
          </button>
          <button
            @click="cancelEditOption"
            type="button"
            class="btn btn-danger"
          >
            Annuler
          </button>
        </div>
        <button v-else @click="addOption" type="button" class="btn btn-primary">
          Ajouter
        </button>
      </div>
    </div>
    <div class="row col-md-12">
      <ul>
        <li
          class="options-row"
          v-for="(option, index) in this.optionsList"
          :key="index"
        >
          <h5 class="text-capitalize font-weight-bold">
            {{ option.name }} :
            <span class="font-weight-light ml-5">{{ option.price }} Dhs</span>
          </h5>
          <div class="actions">
            <a href="#" @click.prevent="deleteOption(index)"
              ><i class="voyager-x text-danger"></i
            ></a>
            <a href="#" @click.prevent="editOption(index)"
              ><i class="voyager-edit text-success"></i
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
    attributeOptions: {
      type: Array,
    },
    formTitle: {
      type: String,
      default: "Les options",
    },
  },
  data() {
    return {
      form: {
        name: "",
        price: "",
      },
      error: null,
      editMode: false,
      currentIndex: null,
      optionsList: this.attributeOptions || [],
    };
  },
  computed: {
    options() {
      return JSON.stringify(this.optionsList);
    },
  },
  methods: {
    validateForm() {
      this.error = null;

      if (this.form.name === "" || this.form.price == "") {
        this.error = "le nom et le prix sont requis";

        return false;
      }

      return true;
    },
    addOption() {
      if (!this.validateForm()) {
        return;
      }

      this.optionsList.push(this.form);

      this.form = {
        name: "",
        price: "",
      };
    },
    deleteOption(index) {
      if (confirm("Es-tu sûr ?")) {
        this.optionsList.splice(index, 1);
      }
    },
    editOption(index) {
      this.form = { ...this.optionsList.find((option, i) => i == index) };

      this.currentIndex = index;

      this.editMode = true;
    },
    cancelEditOption() {
      this.editMode = false;

      this.form = {
        name: "",
        price: "",
      };
    },
    updateOption() {
      if (!this.validateForm()) {
        return;
      }

      this.optionsList[this.currentIndex] = { ...this.form };

      this.editMode = false;

      this.form = {
        name: "",
        price: "",
      };
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
.options-row {
  display: flex;
  gap: 15px;
  border: 1px solid #22a8f08a;
  padding: 7px 15px !important;
  border-radius: 20px;
  box-shadow: rgba(17, 12, 46, 0.15) 0px 48px 100px 0px !important;
  color: #229ef0;
}
.options-row:hover {
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

