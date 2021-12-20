<template>
  <input v-if="!emitOptions" type="hidden" name="options" :value="options" />
  <div class="panel-body">
    <div class="form-title row col-md-12">
      <h4 class="col-md-12">{{ formTitle }}</h4>
    </div>
    <div class="form-inputs row col-md-12">
      <div v-if="formError" class="alert alert-danger">{{ formError }}</div>
      <div class="form-group col-md-6">
        <label class="control-label">Nom</label>
        <input
          v-model="form.name"
          type="text"
          class="form-control"
          placeholder="Nom d'option"
        />
      </div>
      <div class="form-group col-md-6">
        <label class="control-label">Prix</label>
        <input
          v-model="form.price"
          type="number"
          class="form-control"
          placeholder="Prix d'option"
        />
      </div>
    </div>
    <div
      class="required-files-properties row col-md-12"
      style="padding: 0px 40px"
    >
      <h5
        style="margin-bottom: 30px"
        data-toggle="collapse"
        data-target="#required-files-properties-container"
      >
        <i class="voyager-angle-down"></i> Les propriétés des fichiers requis
        pour cette option
      </h5>
      <div id="required-files-properties-container" class="collapse">
        <div class="required-files-properties-form">
          <div
            v-if="requiredFilesPropertiesFormError"
            class="alert alert-danger"
          >
            {{ requiredFilesPropertiesFormError }}
          </div>
          <div class="form-group col-md-4">
            <label class="control-label">Nom de fichier</label>
            <input
              ref="requiredFileName"
              type="text"
              class="form-control"
              placeholder="Nom de fichier"
            />
          </div>
          <div class="form-group col-md-3">
            <label class="control-label">Titre de ficher</label>
            <input
              ref="requiredFileTitle"
              type="text"
              class="form-control"
              placeholder="Titre de ficher"
            />
          </div>
          <div class="form-group col-md-2 form-actions">
            <button
              @click="addFilePropertiesToForm"
              type="button"
              class="btn btn-primary"
            >
              Ajouter les propriétés de fichier
            </button>
          </div>
        </div>
        <div
          v-if="this.form.requiredFilesProperties.length"
          class="required-files-properties-list-container row col-md-12"
        >
          <ul
            class="required-files-properties-list"
            style="margin-left: 20px; padding-inline-start: 5px"
          >
            <li
              style="display: flex; align-items: center; gap: 10px"
              v-for="(fileProperties, index) in this.form
                .requiredFilesProperties"
              :key="index"
            >
              <div class="actions">
                <a href="#" @click.prevent="deleteFilePropertiesFromForm(index)"
                  ><i class="voyager-x text-danger"></i
                ></a>
              </div>
              <h5 class="text-capitalize font-weight-bold">
                {{ fileProperties.name }} :
                <span class="font-weight-light ml-5"
                  >{{ fileProperties.title }}
                </span>
              </h5>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="form-actions row col-md-12">
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
          Ajouter l'option
        </button>
      </div>
    </div>
    <div class="options-list-container row col-md-12">
      <ul class="options-list">
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
    emitOptions: {
      type: Boolean,
      default: false,
    },
  },
  data() {
    return {
      form: {
        name: "",
        price: "",
        requiredFilesProperties: [],
      },
      formError: null,
      requiredFilesPropertiesFormError: null,
      editMode: false,
      currentIndex: null,
      optionsList: [],
    };
  },
  computed: {
    options() {
      return JSON.stringify(this.optionsList);
    },
  },
  emits: ["optionsChanged"],
  watch: {
    optionsList: {
      handler(options) {
        if (this.emitOptions) {
          this.$emit("optionsChanged", options);
        }
      },
      deep: true,
    },
    attributeOptions: {
      handler(attributeOptions) {
        this.optionsList = attributeOptions || [];
      },
      deep: true,
      immediate: true,
    },
  },
  methods: {
    validateForm() {
      this.formError = null;

      if (
        this.form.name.trim() === "" ||
        (typeof this.form.price === "string" && this.form.price.trim() == "")
      ) {
        this.formError = "Le nom et le prix sont requis";

        return false;
      }

      return true;
    },
    validateRequiredFilesPropertiesForm() {
      this.requiredFilesPropertiesFormError = null;

      if (
        this.$refs.requiredFileName.value.trim() === "" ||
        this.$refs.requiredFileTitle.value.trim() === ""
      ) {
        this.requiredFilesPropertiesFormError =
          "Les propriétés de fichier sont obligatoires";

        return false;
      }

      return true;
    },
    addOption() {
      if (!this.validateForm()) {
        return;
      }

      this.optionsList.push(this.form);

      this.resetForm();
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

      this.resetForm();
    },
    updateOption() {
      if (!this.validateForm()) {
        return;
      }

      this.optionsList[this.currentIndex] = { ...this.form };

      this.editMode = false;

      this.resetForm();
    },
    resetForm() {
      this.form = {
        name: "",
        price: "",
        requiredFilesProperties: [],
      };
    },
    /**required file properties */
    addFilePropertiesToForm() {
      if (!this.validateRequiredFilesPropertiesForm()) {
        return;
      }

      this.form.requiredFilesProperties.push({
        name: this.$refs.requiredFileName.value,
        title: this.$refs.requiredFileTitle.value,
      });

      this.$refs.requiredFileName.value = "";
      this.$refs.requiredFileTitle.value = "";
    },
    deleteFilePropertiesFromForm(index) {
      this.form.requiredFilesProperties.splice(index, 1);
    },
  },
};
</script>

<style scoped>
.options-list {
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

