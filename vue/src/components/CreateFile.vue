<script setup lang="ts">
  import { ref } from 'vue'

  interface Document {
    name: string,
    description: string,
    version_number: string,
    file: File,
  }

  const document = ref<Document>({
    name: '',
    description: '',
    version_number: '',
    file: null
  });

  const handleSubmit = async () => {
    const formData = new formData();
    formData.append('name', document.value.name);
    formData.append('description', document.value.description);
    formData.append('version_name', document.value.version_name);

    if(document.value.file) {
      formData.append('file', document.value.file);
    }

    try {
      const response = await fetch('https://host/api/document', {
        method: 'POST',
        body: formData
      });

      if (response.ok) {
        alert('Файл создан');
      } else {
        alert('Ошибка');
      }
    } catch (error) {
      console.error('Error:', error);
    }
}
</script>

<template>
  <div class="create-file-wrapper">
    <form @submit.prevent="handleSubmit">
      <div>
        <div>Имя</div>
        <input type="text" name="name" v-model="document.name">
      </div>
      <div>
        <div>Описание</div>
        <textarea name="description" v-model="document.description"></textarea>
      </div>
      <div>
        <div>Версия</div>
        <input type="text" name="version_number" v-model="document.version_number">
      </div>
      <br>
      <div>
        <input type="file" name="file" @change="document.file = $event.target.files?.[0] || null">
      </div>
      <br>
      <button class="btn">Загрузить</button>
    </form>
  </div>
</template>