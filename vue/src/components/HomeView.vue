<script setup lang="ts">
  interface Documents {
    data: {
      uuid: string,
      name: string,
      description: string,
      version_number: string,
      file_path: string
    }[]
  }

  let documents = {};

  async function fetchDocuments(): Promise<Documents[]> {
    const response = await fetch('https://host/api/document');
    const data: Documents[] = await response.json();
    return data;
  }
  
  fetchDocuments()
    .then(documentsData => {
      documents = documentsData;
    });
</script> 
<template>
    <main>
      <h1>Документы</h1>
      <div class="btn-wrapper">
        <RouterLink class="btn" to="/create">Создать документ</RouterLink>
      </div>
  
      <div class="documents-wrapper">
        <div class="documents-wrapper__list" v-for="document in documents.data" :key="document.uuid">
          <div>{{ document.name }}</div>
          <div>{{ document.description }}</div>
          <div>{{ document.version_number }}</div>
          <RouterLink class="btn" to="/document/{{ document.uuid }}">Смотреть документ</RouterLink>
        </div>
      </div>
    </main>
</template>
