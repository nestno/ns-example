import { toRefs, reactive } from 'vue'
import axios from 'axios'

type dataType<T> = {
    result: T | null;
    loading: boolean;
    loaded: boolean;
    error: T | null;
}

function useUrlLoader<T>(url: string) {

    const data: dataType<T> = reactive({
        result: null,
        loading: true,
        loaded: false,
        error: null
    })
    const tfData = toRefs(data)
    axios.get(url).then((rawData) => {
        data.loading = false
        data.loaded = true
        data.result = rawData.data
    }).catch(e => {
        data.error = e
        data.loading = false
    })
    return {
        ...tfData
    }
}
export default useUrlLoader